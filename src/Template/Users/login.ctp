<div class="users form">
  <?= $this->Flash->render() ?>
  <?= $this->Form->create() ?>
      <fieldset>
          <legend><?= __('Please enter your email address and password') ?></legend>
          <?= $this->Form->control('emailaddress', ['type' => 'email']) ?>
          <?= $this->Form->control('password') ?>
      </fieldset>
  <?= $this->Form->button(__('Login'), ['class' => 'btn btn-info']); ?>
  <?= $this->Form->end() ?>
</div>