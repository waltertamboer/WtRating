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

namespace WtRating\Entity;

/**
 * The representation of a rating. A rating simply said is a score that is bound to a type identifier.
 */
class Rating
{
    /**
     * The identifier of the rating in the storage system.
     *
     * @var int
     */
    private $id;

    /**
     * The type identifier of the rating.
     *
     * @var string
     */
    private $typeId;

    /**
     * The identifier of the user that
     *
     * @var string
     */
    private $userId;

    /**
     * The actual rating.
     *
     * @var int
     */
    private $rating;

    /**
     * Gets the rating's identifier in the storage system.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the rating's identifier in the storage system.
     *
     * @param int $id The identifier to set.
     * @return Rating
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Gets the identifier of the type that is rated.
     *
     * @return string
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Sets the identifier of the type that is rated.
     *
     * @param string $typeId The identifier to set.
     * @return Rating
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
        return $this;
    }

    /**
     * Gets the identifier of the user that gave the rating.
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Sets the identifier of the user that gave the rating.
     *
     * @param int $userId The identifier of the user that gave the rating.
     * @return Rating
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * Gets the rating.
     *
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Sets the rating.
     *
     * @param string $rating The rating to set.
     * @return Rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
        return $this;
    }
}
