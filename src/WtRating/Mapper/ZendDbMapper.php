<?php
/**
 * Copyright (c) 2012 Walter Tamboer
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the names of the copyright holders nor the names of the
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package     WtRating
 * @author      Walter Tamboer <walter.tamboer@live.com>
 * @copyright   2012 Walter Tamboer.
 * @license     http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link        http://waltertamboer.nl
 */

namespace WtRating\Mapper;

use WtRating\Entity\Rating;
use WtRating\Entity\RatingSet;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;

class ZendDbMapper implements MapperInterface
{
    /**
     * The database adapter that is used.
     *
     * @var Adapter
     */
    private $dbAdapter;

    /**
     * The table gateway for the rating database table.
     *
     * @var TableGateway
     */
    private $gateway;

    /**
     * Initializes a new instance of this class.
     *
     * @param Adapter $dbAdapter The database adapter.
     */
    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->gateway = new TableGateway('rating', $this->dbAdapter);
    }

    /**
     * Gets the set of ratings for the given type id.
     *
     * @param string $typeId The type identifier to get the set of ratings for.
     * @return RatingSet
     */
    public function getRatingSet($typeId)
    {
        $adapter = $this->gateway->getAdapter();
        $sql = new Sql($adapter);

        $select = $sql->select();
        $select->from($this->gateway->getTable());
        $select->columns(array(
            'amount' => new Expression('COUNT(rating)'),
            'avarage' => new Expression('AVG(rating)'),
            'minimum' => new Expression('MAX(rating)'),
            'maximum' => new Expression('MIN(rating)'),
        ), false);

        $rowset = $this->gateway->selectWith($select);

        return new RatingSet($typeId, $rowset->current());
    }

    /**
     * Saves the given rating to the storage system.
     *
     * @param Rating $rating The rating to persist.
     */
    public function persist(Rating $rating)
    {
        if ($rating->getId()) {
            $this->gateway->update(array(
                'typeId' => $rating->getTypeId(),
                'userId' => $rating->getUserId(),
                'rating' => $rating->getRating(),
            ), array(
                'id' => $rating->getId()
            ));
        } else {
            $this->gateway->insert(array(
                'typeId' => $rating->getTypeId(),
                'userId' => $rating->getUserId(),
                'rating' => $rating->getRating(),
            ));

            $id = $this->gateway->getLastInsertValue();
            $rating->setId($id);
        }
    }
}
