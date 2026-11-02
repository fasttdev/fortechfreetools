<?php
/**
 * Partial: <head> + opening wrapper.
 * Variabel yang dipakai: $pageTitle, $activePage
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, viewport-fit=cover, maximum-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#0a0f1a" />
    <meta name="description" content="<?= e(APP_NAME) ?> — kumpulan tools developer ringan untuk HP." />
    <title><?= e($pageTitle ?? APP_NAME) ?></title>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body data-page="<?= e($activePage ?? '') ?>">
<div class="app">