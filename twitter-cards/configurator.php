<form class="form-plugin" action="<?php echo $config->url_current; ?>/update" method="post">
  <?php echo Form::hidden('token', $token); ?>
  <?php $twitter_cards_config = File::open(__DIR__ . DS . 'states' . DS . 'config.txt')->unserialize(); ?>
  <label class="grid-group">
    <span class="grid span-2 form-label"><?php echo $speak->plugin_twitter_cards->twitter_site . ' ' . Jot::info($speak->plugin_twitter_cards->description); ?></span>
    <span class="grid span-4">
    <?php echo Form::text('twitter_site', $twitter_cards_config['twitter_site'], Text::parse(File::N($config->host), '->array_key', true), array(
        'class' => 'input-block'
    )); ?>
    </span>
  </label>
  <label class="grid-group">
    <span class="grid span-2 form-label"><?php echo $speak->plugin_twitter_cards->twitter_creator . ' ' . Jot::info($speak->plugin_twitter_cards->description); ?></span>
    <span class="grid span-4">
    <?php echo Form::text('twitter_creator', $twitter_cards_config['twitter_creator'], Text::parse($config->author->name, '->array_key', true), array(
        'class' => 'input-block'
    )); ?>
    </span>
  </label>
  <div class="grid-group">
    <span class="grid span-2"></span>
    <span class="grid span-4"><?php echo Jot::button('action', $speak->update); ?></span>
  </div>
</form>