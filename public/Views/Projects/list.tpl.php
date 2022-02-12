<?php 
$this->set_layout('Views/Layouts/base.tpl.php');

$this->capture();
    $this->include_file('Views/Includes/navbar.tpl.php');
$this->end_capture('nav') ?>

<?php
$this->capture();
    $this->include_file('Views/Includes/mainHeadContent.tpl.php');
$this->end_capture('main_head_content') ?>

<?php $this->capture(); ?>

    <?php foreach($this->data['projects'] as $project) :?>

   <?php endforeach; ?>
   <br/>

   <div class="container">
    <div class="row">
        <div class="col-sm-12">
          <?php foreach($this->data['projects'] as $project) :?>
                <div id="project-card-<?php echo $project->p_id;?>"  class="card mt-2">
                    <ul id="project-list"  class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="float-end"><?php echo $project->s_name ?></div>
                                <h4><?php echo $project->p_title; ?></h4>
                                <p><?php echo $project->o_name; ?> (<?php echo $project->o_email; ?>)</p>
                                <p><?php echo $project->p_description; ?></p>
                                <a class="btn btn-primary" href="/project/edit/<?php echo $project->p_id; ?>" role="button">Szerkesztés</a>
                                <a id="project-delete-btn-<?php echo $project->p_id; ?>" type="button"  class="delete-project-btn btn btn-danger"  data-project="<?php echo $project->p_id; ?>" role="button">Törlés</a>
                        </li>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php $this->end_capture('body') ?>

<?php $this->capture(); ?>
    <script type="text/javascript" src="assets/js/main.js"></script>
<?php $this->end_capture('custom_js'); ?> 