<?php

declare(strict_types=1);

/** @psalm-suppress MissingFile */


require __DIR__ . '/../vendor/autoload.php';


$name = $_GET['name'] ?? 'Guest';

function detectLang(\Framework\Http\Message\ServerRequest $request): string
{
    if (!empty($request->getQueryParams()['lang']) && is_string($request->getQueryParams()['lang')) {
        return $request->getQueryParams()['lang'];
    }

    if (!empty($request->getParsedBody()['lang']) && is_string($request->getParsedBody()['lang'])) {
        return $request->getParsedBody()['lang'];
    }

    if (!empty($request->getCookieParams()['lang'])) {
        return $request->getCookieParams()['lang'];
    }

    if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        return substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    }
    return $default;

}


$request =  \Framework\Http\globals::createServerRequestFromGlobals();

$name = $request->getQueryParams()['name'] ?? "Guest";

if (!is_string($name)) {
    http_response_code(400);
    exit;
}

$language = detectLang("en");
echo "hello " . $name . " you language is " . $language;
