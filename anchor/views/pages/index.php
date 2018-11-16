<?php echo $header; ?>

<header class="wrap">
  <h1><?php echo __('pages.pages'); ?></h1>

    <?php if ($pages->count): ?>
      <nav>
          <?php echo Html::link('admin/pages/add', __('pages.create_page'), ['class' => 'btn']); ?>
          <?php echo Html::link('admin/menu', __('menu.edit_menu'), ['class' => 'btn']); ?>
      </nav>
    <?php endif; ?>
</header>
