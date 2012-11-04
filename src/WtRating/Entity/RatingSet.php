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
 * A set of ratings.
 */
class RatingSet
{
    /**
     * The type id that this set represents.
     *
     * @var string
     */
    private $typeId;

    /**
     * The amount of times a rating was casted.
     *
     * @var int
     */
    private $amount;

    /**
     * The avarage rating.
     *
     * @var int
     */
    private $avarage;

    /**
     * The highest rating that was given.
     *
     * @var int
     */
    private $highest;

    /**
     * The lowest rating that was given.
     *
     * @var int
     */
    private $lowest;

    /**
     * Initialize the instance of this class.
     *
     * @param string $typeId The type id that is represented.
     * @param int $amount
     * @param int $avarage
     * @param int $highest
     * @param int $lowest
     */
    public function __construct($typeId, $amount, $avarage, $highest, $lowest)
    {
        $this->typeId = $typeId;
        $this->amount = $amount;
        $this->avarage = $avarage;
        $this->highest = $highest;
        $this->lowest = $lowest;
    }

    /**
     * Gets the amount of ratings that are given.
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Gets the avarage rating.
     *
     * @return int
     */
    public function getAvarage()
    {
        return $this->avarage;
    }

    /**
     * Gets the highest rating.
     *
     * @return int
     */
    public function getHighest()
    {
        return $this->highest;
    }

    /**
     * Gets the lowest rating.
     *
     * @return int
     */
    public function getLowest()
    {
        return $this->lowest;
    }

    /**
     * Gets the type id.
     *
     * @return string
     */
    public function getTypeId()
    {
        return $this->typeId;
    }
}
