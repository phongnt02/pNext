<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard.index', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard',route('dashboard.index'));
});

Breadcrumbs::for('user.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');
    $trail->push('User',route('user.index'));
});

Breadcrumbs::for('courses.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');
    $trail->push('Courses',route('courses.index'));
});
Breadcrumbs::for('courses.add', function (BreadcrumbTrail $trail) {
    $trail->parent('courses.index');
    $trail->push('Create Courses',route('courses.add'));
});
Breadcrumbs::for('courses.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('courses.index');
    $trail->push('Edit Courses',route('courses.edit'));
});

Breadcrumbs::for('chapters.index', function (BreadcrumbTrail $trail, ...$params) {
    $courses_id = isset($params[0]) ? $params[0] : null;
    $trail->parent('courses.index');
    $trail->push('Chapters', route('chapters.index', $courses_id));
});
Breadcrumbs::for('chapters.add', function (BreadcrumbTrail $trail, ...$params) {
    $courses_id = isset($params[0]) ? $params[0] : null;
    $trail->parent('chapters.index', $courses_id);
    $trail->push('Add Chapters', route('chapters.add', $courses_id));
});
Breadcrumbs::for('chapters.edit', function (BreadcrumbTrail $trail, ...$params) {
    $courses_id = isset($params[0]) ? $params[0] : null;
    $trail->parent('chapters.index', $courses_id);
    $trail->push('Edit Chapters', route('chapters.edit', $courses_id));
});

Breadcrumbs::for('lessons.index', function (BreadcrumbTrail $trail, ...$params) {
    $chapters_id = isset($params[0]) ? $params[0] : null;
    $trail->parent('chapters.index', session('courses_id'));
    $trail->push('Lessons', route('lessons.index', $chapters_id));
});
Breadcrumbs::for('lessons.add', function (BreadcrumbTrail $trail, ...$params) {
    $chapters_id = isset($params[0]) ? $params[0] : null;
    $trail->parent('lessons.index', $chapters_id);
    $trail->push('Add Lessons', route('lessons.add', $chapters_id));
});
Breadcrumbs::for('lessons.edit', function (BreadcrumbTrail $trail, ...$params) {
    $chapters_id = isset($params[0]) ? $params[0] : null;
    $trail->parent('lessons.index', $chapters_id);
    $trail->push('Edit Lessons', route('lessons.edit', $chapters_id));
});