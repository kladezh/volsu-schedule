<?php require_once "views/templates/header.php" ?>

<main class="main mt-4">
    <div class="schedule-info">
        <div class="container">
            <div class="d-flex justify-content-between">
                <a href="#" class="schedule-info-weektype schedule-info-text"><?= htmlspecialchars($vh->week) ?> - текущая</a>
                <div class="dropdown dropend schedule-info-group">
                    <button class="btn dropdown-toggle p-0" type="button" id="dropdownMenuGroup" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="schedule-info-text"><?= htmlspecialchars($vh->activeGroup) ?></span>
                    </button>

                    <ul class="dropdown-menu">
                        <?php foreach ($vh->groups as $group) : ?>
                            <li>
                                <a class="dropdown-item" href="?controller=main&group=<?= htmlspecialchars($group) ?>">
                                    <span class="schedule-info-text"><?= htmlspecialchars($group) ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <hr class="m-0">
        </div>
    </div>

    <section class="schedule">
        <div class="container">
            <div class="row my-3 pb-4 pt-1">
                <div class="col-3">
                    <div class="d-flex align-items-start">
                        <div class="schedule-days">
                            <ul class="nav nav-pills flex-column flex-nowrap" id="weekdays-tab" role="tablist" aria-orientation="vertical">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="weekdays-monday-tab" data-bs-toggle="pill" data-bs-target="#weekdays-monday" type="button" role="tab" aria-controls="weekdays-monday" aria-selected="true">
                                        <div class="row justify-content-between">
                                            <div class="col-10">
                                                <span class="day-wrap">Понедельник</span>
                                                <br>
                                                <span class="date-wrap"><?= htmlspecialchars($vh->weekdate['monday']) ?></span>
                                            </div>
                                            <div class="col-2 d-flex justify-content-end align-items-center px-0">
                                                <svg class="icn icn-arrow" width="24px" height="24px">
                                                    <use xlink:href="views/assets/img/icons/sprites.svg#icnArrowSlim">
                                                    </use>
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="weekdays-tuesday-tab" data-bs-toggle="pill" data-bs-target="#weekdays-tuesday" type="button" role="tab" aria-controls="weekdays-tuesday" aria-selected="false">
                                        <div class="row justify-content-between">
                                            <div class="col-10">
                                                <span class="day-wrap">Вторник</span>
                                                <br>
                                                <span class="date-wrap"><?= htmlspecialchars($vh->weekdate['tuesday']) ?></span>
                                            </div>
                                            <div class="col-2 d-flex justify-content-end align-items-center px-0">
                                                <svg class="icn icn-arrow" width="24px" height="24px">
                                                    <use xlink:href="views/assets/img/icons/sprites.svg#icnArrowSlim">
                                                    </use>
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="weekdays-wednesday-tab" data-bs-toggle="pill" data-bs-target="#weekdays-wednesday" type="button" role="tab" aria-controls="weekdays-wednesday" aria-selected="false">
                                        <div class="row justify-content-between">
                                            <div class="col-10">
                                                <span class="day-wrap">Среда</span>
                                                <br>
                                                <span class="date-wrap"><?= htmlspecialchars($vh->weekdate['wednesday']) ?></span>
                                            </div>
                                            <div class="col-2 d-flex justify-content-end align-items-center px-0">
                                                <svg class="icn icn-arrow" width="24px" height="24px">
                                                    <use xlink:href="views/assets/img/icons/sprites.svg#icnArrowSlim">
                                                    </use>
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="weekdays-thursday-tab" data-bs-toggle="pill" data-bs-target="#weekdays-thursday" type="button" role="tab" aria-controls="weekdays-thursday" aria-selected="false">
                                        <div class="row justify-content-between">
                                            <div class="col-10">
                                                <span class="day-wrap">Четверг</span>
                                                <br>
                                                <span class="date-wrap"><?= htmlspecialchars($vh->weekdate['thursday']) ?></span>
                                            </div>
                                            <div class="col-2 d-flex justify-content-end align-items-center px-0">
                                                <svg class="icn icn-arrow" width="24px" height="24px">
                                                    <use xlink:href="views/assets/img/icons/sprites.svg#icnArrowSlim">
                                                    </use>
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="weekdays-friday-tab" data-bs-toggle="pill" data-bs-target="#weekdays-friday" type="button" role="tab" aria-controls="weekdays-friday" aria-selected="false">
                                        <div class="row justify-content-between">
                                            <div class="col-10">
                                                <span class="day-wrap">Пятница</span>
                                                <br>
                                                <span class="date-wrap"><?= htmlspecialchars($vh->weekdate['friday']) ?></span>
                                            </div>
                                            <div class="col-2 d-flex justify-content-end align-items-center px-0">
                                                <svg class="icn icn-arrow" width="24px" height="24px">
                                                    <use xlink:href="views/assets/img/icons/sprites.svg#icnArrowSlim">
                                                    </use>
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="weekdays-saturday-tab" data-bs-toggle="pill" data-bs-target="#weekdays-saturday" type="button" role="tab" aria-controls="weekdays-saturday" aria-selected="false">
                                        <div class="row justify-content-between">
                                            <div class="col-10">
                                                <span class="day-wrap">Суббота</span>
                                                <br>
                                                <span class="date-wrap"><?= htmlspecialchars($vh->weekdate['saturday']) ?></span>
                                            </div>
                                            <div class="col-2 d-flex justify-content-end align-items-center px-0">
                                                <svg class="icn icn-arrow" width="24px" height="24px">
                                                    <use xlink:href="views/assets/img/icons/sprites.svg#icnArrowSlim">
                                                    </use>
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="schedule-board">
                        <div class="px-5 py-4">
                            <div class="tab-content" id="weekdays-tabContent">
                                <div class="tab-pane fade show active" id="weekdays-monday" role="tabpanel" aria-labelledby="weekdays-monday-tab">
                                    <?php if (empty($vh->days['monday'])) : ?>
                                        <div class="schedule-classes-noclass-msg">
                                            пар нет...
                                        </div>
                                    <?php else : ?>

                                        <div class="d-flex flex-column schedule-classes">
                                            <?php foreach ($vh->days['monday'] as $key => $class) : ?>
                                                <div class="d-flex flex-column schedule-class">
                                                    <div class="d-flex align-items-center schedule-class-header">
                                                        <div class="schedule-class-header-num">
                                                            <?= ($key + 1) ?>
                                                        </div>
                                                        <span class="ms-3 schedule-class-header-name">
                                                            <?= htmlspecialchars($class->name()) ?>
                                                            <br>
                                                            <?= '(' . htmlspecialchars($class->type()) . ')' ?>
                                                        </span>
                                                    </div>
                                                    <div class="mt-3 ps-2 d-flex flex-column schedule-class-body">
                                                        <?php if ($class->teacher() !== null) : ?>
                                                            <div class="d-flex schedule-class-body-teacher">
                                                                <div>
                                                                    <svg class="icn icn-class" width="24px" height="24px">
                                                                        <use xlink:href="views/assets/img/icons/sprites.svg#icnTeacher">
                                                                        </use>
                                                                    </svg>
                                                                </div>
                                                                <span>
                                                                    <?= htmlspecialchars($class->teacher()) ?>
                                                                </span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="d-flex schedule-class-body-time">
                                                            <div>
                                                                <svg class="icn icn-class" width="24px" height="24px">
                                                                    <use xlink:href="views/assets/img/icons/sprites.svg#icnTimeClock">
                                                                    </use>
                                                                </svg>
                                                            </div>
                                                            <span>
                                                                <?= htmlspecialchars($class->time()) ?>
                                                            </span>
                                                        </div>
                                                        <div class="d-flex schedule-class-body-classroom">
                                                            <div>
                                                                <svg class="icn icn-class" width="24px" height="24px">
                                                                    <use xlink:href="views/assets/img/icons/sprites.svg#icnClassroom">
                                                                    </use>
                                                                </svg>
                                                            </div>
                                                            <span>
                                                                <?= htmlspecialchars($class->classroom()) ?>
                                                            </span>
                                                        </div>
                                                        <?php if ($class->subgroup() !== null) : ?>
                                                            <div class="d-flex schedule-class-body-subsgroup">
                                                                <div>
                                                                    <svg class="icn icn-class" width="24px" height="24px">
                                                                        <use xlink:href="views/assets/img/icons/sprites.svg#icnSubgroup">
                                                                        </use>
                                                                    </svg>
                                                                </div>
                                                                <span>
                                                                    <?= htmlspecialchars($class->subgroup()) ?>
                                                                </span>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="tab-pane fade" id="weekdays-tuesday" role="tabpanel" aria-labelledby="weekdays-tuesday-tab">
                                    <?php if (empty($vh->days['tuesday'])) : ?>
                                        <div class="schedule-classes-noclass-msg">
                                            пар нет...
                                        </div>
                                    <?php else : ?>

                                        <div class="d-flex flex-column schedule-classes">
                                            <?php foreach ($vh->days['tuesday'] as $key => $class) : ?>
                                                <div class="d-flex flex-column schedule-class">
                                                    <div class="d-flex align-items-center schedule-class-header">
                                                        <div class="schedule-class-header-num">
                                                            <?= ($key + 1) ?>
                                                        </div>
                                                        <span class="ms-3 schedule-class-header-name">
                                                            <?= htmlspecialchars($class->name()) ?>
                                                            <br>
                                                            <?= '(' . htmlspecialchars($class->type()) . ')' ?>
                                                        </span>
                                                    </div>
                                                    <div class="mt-3 ps-2 d-flex flex-column schedule-class-body">
                                                        <?php if ($class->teacher() !== null) : ?>
                                                            <div class="d-flex schedule-class-body-teacher">
                                                                <div>
                                                                    <svg class="icn icn-class" width="24px" height="24px">
                                                                        <use xlink:href="views/assets/img/icons/sprites.svg#icnTeacher">
                                                                        </use>
                                                                    </svg>
                                                                </div>
                                                                <span>
                                                                    <?= htmlspecialchars($class->teacher()) ?>
                                                                </span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="d-flex schedule-class-body-time">
                                                            <div>
                                                                <svg class="icn icn-class" width="24px" height="24px">
                                                                    <use xlink:href="views/assets/img/icons/sprites.svg#icnTimeClock">
                                                                    </use>
                                                                </svg>
                                                            </div>
                                                            <span>
                                                                <?= htmlspecialchars($class->time()) ?>
                                                            </span>
                                                        </div>
                                                        <div class="d-flex schedule-class-body-classroom">
                                                            <div>
                                                                <svg class="icn icn-class" width="24px" height="24px">
                                                                    <use xlink:href="views/assets/img/icons/sprites.svg#icnClassroom">
                                                                    </use>
                                                                </svg>
                                                            </div>
                                                            <span>
                                                                <?= htmlspecialchars($class->classroom()) ?>
                                                            </span>
                                                        </div>
                                                        <?php if ($class->subgroup() !== null) : ?>
                                                            <div class="d-flex schedule-class-body-subsgroup">
                                                                <div>
                                                                    <svg class="icn icn-class" width="24px" height="24px">
                                                                        <use xlink:href="views/assets/img/icons/sprites.svg#icnSubgroup">
                                                                        </use>
                                                                    </svg>
                                                                </div>
                                                                <span>
                                                                    <?= htmlspecialchars($class->subgroup()) ?>
                                                                </span>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="tab-pane fade" id="weekdays-wednesday" role="tabpanel" aria-labelledby="weekdays-wednesday-tab">
                                    <?php if (empty($vh->days['wednesday'])) : ?>
                                        <div class="schedule-classes-noclass-msg">
                                            пар нет...
                                        </div>
                                    <?php else : ?>

                                        <div class="d-flex flex-column schedule-classes">
                                            <?php foreach ($vh->days['wednesday'] as $key => $class) : ?>
                                                <div class="d-flex flex-column schedule-class">
                                                    <div class="d-flex align-items-center schedule-class-header">
                                                        <div class="schedule-class-header-num">
                                                            <?= ($key + 1) ?>
                                                        </div>
                                                        <span class="ms-3 schedule-class-header-name">
                                                            <?= htmlspecialchars($class->name()) ?>
                                                            <br>
                                                            <?= '(' . htmlspecialchars($class->type()) . ')' ?>
                                                        </span>
                                                    </div>
                                                    <div class="mt-3 ps-2 d-flex flex-column schedule-class-body">
                                                        <?php if ($class->teacher() !== null) : ?>
                                                            <div class="d-flex schedule-class-body-teacher">
                                                                <div>
                                                                    <svg class="icn icn-class" width="24px" height="24px">
                                                                        <use xlink:href="views/assets/img/icons/sprites.svg#icnTeacher">
                                                                        </use>
                                                                    </svg>
                                                                </div>
                                                                <span>
                                                                    <?= htmlspecialchars($class->teacher()) ?>
                                                                </span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="d-flex schedule-class-body-time">
                                                            <div>
                                                                <svg class="icn icn-class" width="24px" height="24px">
                                                                    <use xlink:href="views/assets/img/icons/sprites.svg#icnTimeClock">
                                                                    </use>
                                                                </svg>
                                                            </div>
                                                            <span>
                                                                <?= htmlspecialchars($class->time()) ?>
                                                            </span>
                                                        </div>
                                                        <div class="d-flex schedule-class-body-classroom">
                                                            <div>
                                                                <svg class="icn icn-class" width="24px" height="24px">
                                                                    <use xlink:href="views/assets/img/icons/sprites.svg#icnClassroom">
                                                                    </use>
                                                                </svg>
                                                            </div>
                                                            <span>
                                                                <?= htmlspecialchars($class->classroom()) ?>
                                                            </span>
                                                        </div>
                                                        <?php if ($class->subgroup() !== null) : ?>
                                                            <div class="d-flex schedule-class-body-subsgroup">
                                                                <div>
                                                                    <svg class="icn icn-class" width="24px" height="24px">
                                                                        <use xlink:href="views/assets/img/icons/sprites.svg#icnSubgroup">
                                                                        </use>
                                                                    </svg>
                                                                </div>
                                                                <span>
                                                                    <?= htmlspecialchars($class->subgroup()) ?>
                                                                </span>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="tab-pane fade" id="weekdays-thursday" role="tabpanel" aria-labelledby="weekdays-thursday-tab">
                                    <?php if (empty($vh->days['thursday'])) : ?>
                                        <div class="schedule-classes-noclass-msg">
                                            пар нет...
                                        </div>
                                    <?php else : ?>

                                        <div class="d-flex flex-column schedule-classes">
                                            <?php foreach ($vh->days['thursday'] as $key => $class) : ?>
                                                <div class="d-flex flex-column schedule-class">
                                                    <div class="d-flex align-items-center schedule-class-header">
                                                        <div class="schedule-class-header-num">
                                                            <?= ($key + 1) ?>
                                                        </div>
                                                        <span class="ms-3 schedule-class-header-name">
                                                            <?= htmlspecialchars($class->name()) ?>
                                                            <br>
                                                            <?= '(' . htmlspecialchars($class->type()) . ')' ?>
                                                        </span>
                                                    </div>
                                                    <div class="mt-3 ps-2 d-flex flex-column schedule-class-body">
                                                        <?php if ($class->teacher() !== null) : ?>
                                                            <div class="d-flex schedule-class-body-teacher">
                                                                <div>
                                                                    <svg class="icn icn-class" width="24px" height="24px">
                                                                        <use xlink:href="views/assets/img/icons/sprites.svg#icnTeacher">
                                                                        </use>
                                                                    </svg>
                                                                </div>
                                                                <span>
                                                                    <?= htmlspecialchars($class->teacher()) ?>
                                                                </span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="d-flex schedule-class-body-time">
                                                            <div>
                                                                <svg class="icn icn-class" width="24px" height="24px">
                                                                    <use xlink:href="views/assets/img/icons/sprites.svg#icnTimeClock">
                                                                    </use>
                                                                </svg>
                                                            </div>
                                                            <span>
                                                                <?= htmlspecialchars($class->time()) ?>
                                                            </span>
                                                        </div>
                                                        <div class="d-flex schedule-class-body-classroom">
                                                            <div>
                                                                <svg class="icn icn-class" width="24px" height="24px">
                                                                    <use xlink:href="views/assets/img/icons/sprites.svg#icnClassroom">
                                                                    </use>
                                                                </svg>
                                                            </div>
                                                            <span>
                                                                <?= htmlspecialchars($class->classroom()) ?>
                                                            </span>
                                                        </div>
                                                        <?php if ($class->subgroup() !== null) : ?>
                                                            <div class="d-flex schedule-class-body-subsgroup">
                                                                <div>
                                                                    <svg class="icn icn-class" width="24px" height="24px">
                                                                        <use xlink:href="views/assets/img/icons/sprites.svg#icnSubgroup">
                                                                        </use>
                                                                    </svg>
                                                                </div>
                                                                <span>
                                                                    <?= htmlspecialchars($class->subgroup()) ?>
                                                                </span>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="tab-pane fade" id="weekdays-friday" role="tabpanel" aria-labelledby="weekdays-friday-tab">
                                    <?php if (empty($vh->days['friday'])) : ?>
                                        <div class="schedule-classes-noclass-msg">
                                            пар нет...
                                        </div>
                                    <?php else : ?>

                                        <div class="d-flex flex-column schedule-classes">
                                            <?php foreach ($vh->days['friday'] as $key => $class) : ?>
                                                <div class="d-flex flex-column schedule-class">
                                                    <div class="d-flex align-items-center schedule-class-header">
                                                        <div class="schedule-class-header-num">
                                                            <?= ($key + 1) ?>
                                                        </div>
                                                        <span class="ms-3 schedule-class-header-name">
                                                            <?= htmlspecialchars($class->name()) ?>
                                                            <br>
                                                            <?= '(' . htmlspecialchars($class->type()) . ')' ?>
                                                        </span>
                                                    </div>
                                                    <div class="mt-3 ps-2 d-flex flex-column schedule-class-body">
                                                        <?php if ($class->teacher() !== null) : ?>
                                                            <div class="d-flex schedule-class-body-teacher">
                                                                <div>
                                                                    <svg class="icn icn-class" width="24px" height="24px">
                                                                        <use xlink:href="views/assets/img/icons/sprites.svg#icnTeacher">
                                                                        </use>
                                                                    </svg>
                                                                </div>
                                                                <span>
                                                                    <?= htmlspecialchars($class->teacher()) ?>
                                                                </span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="d-flex schedule-class-body-time">
                                                            <div>
                                                                <svg class="icn icn-class" width="24px" height="24px">
                                                                    <use xlink:href="views/assets/img/icons/sprites.svg#icnTimeClock">
                                                                    </use>
                                                                </svg>
                                                            </div>
                                                            <span>
                                                                <?= htmlspecialchars($class->time()) ?>
                                                            </span>
                                                        </div>
                                                        <div class="d-flex schedule-class-body-classroom">
                                                            <div>
                                                                <svg class="icn icn-class" width="24px" height="24px">
                                                                    <use xlink:href="views/assets/img/icons/sprites.svg#icnClassroom">
                                                                    </use>
                                                                </svg>
                                                            </div>
                                                            <span>
                                                                <?= htmlspecialchars($class->classroom()) ?>
                                                            </span>
                                                        </div>
                                                        <?php if ($class->subgroup() !== null) : ?>
                                                            <div class="d-flex schedule-class-body-subsgroup">
                                                                <div>
                                                                    <svg class="icn icn-class" width="24px" height="24px">
                                                                        <use xlink:href="views/assets/img/icons/sprites.svg#icnSubgroup">
                                                                        </use>
                                                                    </svg>
                                                                </div>
                                                                <span>
                                                                    <?= htmlspecialchars($class->subgroup()) ?>
                                                                </span>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="tab-pane fade" id="weekdays-saturday" role="tabpanel" aria-labelledby="weekdays-saturday-tab">
                                    <?php if (empty($vh->days['saturday'])) : ?>
                                        <div class="schedule-classes-noclass-msg">
                                            пар нет...
                                        </div>
                                    <?php else : ?>

                                        <div class="d-flex flex-column schedule-classes">
                                            <?php foreach ($vh->days['saturday'] as $key => $class) : ?>
                                                <div class="d-flex flex-column schedule-class">
                                                    <div class="d-flex align-items-center schedule-class-header">
                                                        <div class="schedule-class-header-num">
                                                            <?= ($key + 1) ?>
                                                        </div>
                                                        <span class="ms-3 schedule-class-header-name">
                                                            <?= htmlspecialchars($class->name()) ?>
                                                            <br>
                                                            <?= '(' . htmlspecialchars($class->type()) . ')' ?>
                                                        </span>
                                                    </div>
                                                    <div class="mt-3 ps-2 d-flex flex-column schedule-class-body">
                                                        <?php if ($class->teacher() !== null) : ?>
                                                            <div class="d-flex schedule-class-body-teacher">
                                                                <div>
                                                                    <svg class="icn icn-class" width="24px" height="24px">
                                                                        <use xlink:href="views/assets/img/icons/sprites.svg#icnTeacher">
                                                                        </use>
                                                                    </svg>
                                                                </div>
                                                                <span>
                                                                    <?= htmlspecialchars($class->teacher()) ?>
                                                                </span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="d-flex schedule-class-body-time">
                                                            <div>
                                                                <svg class="icn icn-class" width="24px" height="24px">
                                                                    <use xlink:href="views/assets/img/icons/sprites.svg#icnTimeClock">
                                                                    </use>
                                                                </svg>
                                                            </div>
                                                            <span>
                                                                <?= htmlspecialchars($class->time()) ?>
                                                            </span>
                                                        </div>
                                                        <div class="d-flex schedule-class-body-classroom">
                                                            <div>
                                                                <svg class="icn icn-class" width="24px" height="24px">
                                                                    <use xlink:href="views/assets/img/icons/sprites.svg#icnClassroom">
                                                                    </use>
                                                                </svg>
                                                            </div>
                                                            <span>
                                                                <?= htmlspecialchars($class->classroom()) ?>
                                                            </span>
                                                        </div>
                                                        <?php if ($class->subgroup() !== null) : ?>
                                                            <div class="d-flex schedule-class-body-subsgroup">
                                                                <div>
                                                                    <svg class="icn icn-class" width="24px" height="24px">
                                                                        <use xlink:href="views/assets/img/icons/sprites.svg#icnSubgroup">
                                                                        </use>
                                                                    </svg>
                                                                </div>
                                                                <span>
                                                                    <?= htmlspecialchars($class->subgroup()) ?>
                                                                </span>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- row -->
        </div> <!-- container -->
    </section>
</main>

<?php require_once "views/templates/footer.php" ?>