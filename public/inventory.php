<aside id="hero" class="hero">
    <a href="#" class="close">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
        </svg>
    </a>
    <div class="slots equipment">
        <div data-slot="Main weapon" class="slot">
            <?php if (method_exists($heracles, 'getWeapon') && $heracles->getWeapon() !== null) : ?>
                <img src="<?= $heracles->getWeapon()->getImage() ?>" alt="weapon">
            <?php endif; ?>
        </div>
        <div data-slot="Shield" class="slot">
            <?php if (method_exists($heracles, 'getShield') && $heracles->getShield() !== null) : ?>
                <img src="<?= $heracles->getShield()->getImage() ?>" alt="shield">
            <?php endif; ?>
        </div>
        <div data-slot="Secondary weapon" class="slot"></div>
        <div data-slot="Head" class="slot">
            <?php if (method_exists($heracles, 'getHelmet') && $heracles->getHelmet() !== null) : ?>
                <img src="<?= $heracles->getHelmet()->getImage() ?>" alt="helmet">
            <?php endif; ?>

        </div>
        <div data-slot="Ring" class="slot"></div>
        <div data-slot="Armory" class="slot"></div>
        <div data-slot="Attack" class="slot statistic">
            <?php if (method_exists($heracles, 'getDamage')) {
                echo $heracles->getDamage();
            } ?>
        </div>
        <div data-slot="Defense" class="slot statistic">
            <?php if (method_exists($heracles, 'getDefense')) {
                echo $heracles->getDefense();
            }  ?>
        </div>
        <div data-slot="Life" class="slot statistic"><?= $heracles->getLife() ?></div>
        <div data-slot="Range" class="slot statistic">
            <?php if (method_exists($heracles, 'getRange')) {
                echo $heracles->getRange();
            }  ?>
        </div>    </div>
    <div class="character">
        <h2 class="name"><?= $heracles->getName() ?></h2>
        <div class="avatar">
            <img src="<?= $heracles->getImage() ?>" alt="heracles">
        </div>
        <p class="level">Level 1</p>
    </div>

    <div class="slots inventory">
        <div class="slot"></div>
        <div class="slot"></div>
        <div class="slot"></div>
        <div class="slot"></div>
        <div class="slot"></div>
        <div class="slot"></div>
        <div class="slot"></div>
        <div class="slot"></div>
        <div class="slot"></div>
        <div class="slot"></div>
    </div>
</aside>