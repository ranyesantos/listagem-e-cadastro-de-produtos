<?php 

if(isset($_SESSION['msg'])) { ?>
    <div class="d-flex justify-content-center ">
        <div class="toast align-items-center position-absolute bg-trasparent " role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="2500" >
            <div class="d-flex">
                <div class="toast-body fs-5">
                    <?=$_SESSION['msg']?>
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
<?php } unset($_SESSION['msg']) ?>