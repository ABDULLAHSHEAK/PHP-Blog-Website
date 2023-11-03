<!-- Button trigger modal -->
<!-- Button trigger modal -->
<button style="font-size: 25px;" type="button" class="btn text-danger p-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $cat_id ?>">
  <i class="fa fa-trash-o" aria-hidden="true"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop<?php echo $cat_id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-left">
        Are you sure want to delete ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="categories.php?deleteId=<?php echo $cat_id ?>">
          <button type="button" class="btn btn-danger">Delete</button>
        </a>
      </div>
    </div>
  </div>
</div>