
<?php 
$this->set_layout('Views/Layouts/base.tpl.php');


$this->capture();
    $this->include_file('Views/Includes/navbar.tpl.php');
$this->end_capture('nav'); ?>

<?php
$this->capture();
    $this->include_file('Views/Includes/mainHeadContent.tpl.php');
$this->end_capture('main_head_content') ?>

<?php $this->capture();?>

<?php
 if($this->data['projects']){$method = 'PUT';}else{$method =  'POST';};
 if($this->data['projects']){$action = 'project/'.$this->data['projects'][0]->p_id;}else{$action = '/project';} ?>

<form id="create-project-form" method="<?php echo $method ?>" action="<?php echo $action ;?>">
  <div class="form-group mt-2">
    <label for="titleInput">Cím</label>
    <input name="title" type="text" class="form-control" id="titleInput"  value="<?php if($this->data['projects']){ echo $this->data['projects'][0]->p_title;}?>" aria-describedby="projectTitle" placeholder="">
  </div>
  <div class="form-group  mt-2">
    <label for="descriptionInput">Leírás</label>
    <textarea name="description" type="text" class="form-control" id="descriptionInput" placeholder=""><?php if($this->data['projects']){ echo $this->data['projects'][0]->p_description;}?></textarea>
  </div>
  
  <div class="form-group  mt-2">
      <label for="status">Státusz</label>
    <select name="status" class="form-select" aria-label="status-select">
        <?php foreach($this->data['statuses'] as $status):?>
          <option value="<?php echo $status->id?>"
            <?php if($this->data['projects'] && $status->id == $this->data['projects'][0]->s_id){echo 'selected';}?>>
            <?php echo $status->name;?>
         </option>
        <?php endforeach;?>
    </select>
  </div>

    <div id="owner-row" class="form-group  mt-2 row">
    <div class="col-10">
            
      <label for="owner">Kapcsolattartó</label>
    <select id="owner-select" name="owner" class="form-select" aria-label="owner-select">
        <?php foreach($this->data['owners'] as $owner):?>
          <option value="<?php echo $owner->id?>" 
           <?php if($this->data['projects'] && $owner->id == $this->data['projects'][0]->o_id){echo 'selected';}?>>
        <?php echo $owner->name;?> </option>
        <?php endforeach;?>
    </select>
    </div>
     <div class="col-2 text-start">
  
      <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#addNewOwnerModal">
        <i class="bi bi-person-plus"></i>
      </button>

   
    </div> 
     <div id="add-owner-form" class="col-12"></div>      
    </div>
  </div>
  <button type="submit" class="btn btn-primary mt-2">Mentés</button>


</form>


<div class="modal fade" id="addNewOwnerModal" tabindex="-1" aria-labelledby="addNewOwnerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Új kapcsolattartó hozzáadása</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <?php $this->include_file('Views/Includes/addOwnerForm.tpl.php');?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Mégse</button>
        <button id='save-new-owner' type="button" class="btn btn-success"><i class="bi bi-person-plus-fill"></i> Mentés</button>
      </div>
    </div>
  </div>
</div>
   
<?php $this->end_capture('body') ?>

<?php $this->capture(); ?>
    <script type="text/javascript" src="/assets/js/main.js"></script>
<?php $this->end_capture('custom_js'); ?> 