<?php
/**
 * Copyright (c) 2012 Walter Tamboer.
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

namespace WtRating;

use Zend\Db\Adapter\Adapter as ZendDbAdapter;

return array(
    'invokables' => array(
        'wtrating.rating' => 'WtRating\Entity\Rating',
        'wtrating.service' => 'WtRating\Service\RatingService',
    ),
    'factories' => array(
        'wtrating.mapper' => function ($sm) {
            $config = array(
                'driver' => 'Pdo',
                'dsn' => 'mysql:dbname=test;hostname=localhost',
                'username' => 'root',
                'password' => 'root',
                'driver_options' => array()
            );

            $dbAdapter = new ZendDbAdapter($config);
            return new \WtRating\Mapper\ZendDbMapper($dbAdapter);
        }
    ),
);
