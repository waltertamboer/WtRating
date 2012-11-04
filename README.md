# WtRating

Version 0.0.1

[![Build Status](https://travis-ci.org/WalterTamboer/WtRating.png)](https://travis-ci.org/WalterTamboer/WtRating)

## Introduction

This is a Zend Framework 2 module that provides functionality to rate or like something.

## Requirements

* [Zend Framework 2](https://github.com/zendframework/zf2)

## Installation

Add this repository as a submodule to your repository or install using Composer:

```
{
    "require": {
        "waltertamboer/wtrating": "*"
    }
}
```

## Usage

### Setup

Setup the mapper that you want to use. By default this module only comes with a Zend\Db mapper.

```
'service_manager' => array(
    'factories' => array(
        'wtrating.mapper' => function ($sm) {
            $dbAdapter = $sm->get('... db adapter ...');
            return new \WtRating\Mapper\ZendDbMapper($dbAdapter);
        }
    ),
)
```

### Rate something

To add a rating you could do the following:

```
public function indexAction()
{
    // The id of the user that is currently logged in or null if there is no user:
    $userId = ...;

    // The type that identifies the rating:
    $typeId = 'my-article-163';

    // The rating to set, make something up:
    $rating = rand();

    $serviceLocator = $this->getServiceLocator();

    // Create a new rating:
    $rating = $serviceLocator->create('wtrating.rating');
    $rating->setTypeId($typeId);
    $rating->setUserId($userId);
    $rating->setRating($rating);

    // Save the rating to the storage device:
    $ratingService = $serviceLocator->get('wtrating.service');
    $ratingService->persist($rating);

    // Retrieve the rating set that contains information like avarage rating,
    // amount of rates, etc.
    return new ViewModel(array(
        'ratingSet' => $ratingService->getRatingSet($typeId)
    ));
}
```

### Show ratings

There is a view helper that can be invoked:

```
$this->wtRating($ratingSet);
```

It's possible to add attributes as well:

```
$this->wtRating($this->ratingSet, array(
    'class' => 'rating'
));
```

If you want to change the HTML element you can use the third parameter:

```
$this->wtRating($this->ratingSet, array(), 'div');
```
