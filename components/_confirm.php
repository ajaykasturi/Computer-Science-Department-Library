<?php
echo '<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="reserveConfirm" tabindex="-1" aria-labelledby="reserveModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="reserveModalLabel">Confirm your book</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="./components/_handlereserve.php" method="post">
            <input type="hidden" name="bookid" id="bookid" />
            <input type="hidden" name="booktitle" id="booktitle" />
            <input type="hidden" name="bookauthor" id="bookauthor" />
            <div class="mb-3">
                <label><strong>Title:</strong></label>
                <label id="titlereserve" class="form-label"></label>
            </div>
            <!-- <button type="submit" class="btn btn-primary">Update Note</button> -->
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Confirm</button>
        </form>

      </div>
    </div>
  </div>
</div>';
?>