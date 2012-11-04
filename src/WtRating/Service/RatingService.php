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

namespace WtRating\Service;

use WtRating\Entity\Rating;
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;

/**
 * The RatingService class represents the service layer between rating entities
 * and the storage system.
 */
class RatingService implements ServiceManagerAwareInterface
{
    /**
     * The mapper to the storage system.
     *
     * @var MapperInterface
     */
    private $mapper;

    /**
     * The service manager that is used to retrieve services.
     *
     * @var ServiceManager
     */
    private $serviceManager;

    /**
     * Gets the mapper that is used by this service.
     *
     * @return MapperInterface
     */
    public function getMapper()
    {
        if ($this->mapper === null) {
            $this->mapper = $this->serviceManager->get('wtrating.mapper');
        }
        return $this->mapper;
    }

    /**
     * Saves the given rating to the storage system.
     *
     * @param Rating $rating The rating to persist.
     */
    public function persist(Rating $rating)
    {
        return $this->getMapper()->persist($rating);
    }

    /**
     * Sets the service manager.
     *
     * @param ServiceManager $serviceManager The service manager to set.
     */
    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }
}
