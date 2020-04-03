<div class="card">
    <div class="card-header">Share Something</div>
    <div class="card-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="share_title">Share Title</label>
                <input type="text" class="form-control" id="share_title" name="share_title">
            </div>
            <div class="form-group">
                <label for="share_body">Share Body</label>
                <textarea name="share_body" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="share_link">Share Link</label>
                <input type="text" class="form-control" id="share_link" name="share_link">
            </div>            
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
            <a href="<?php echo ROOT_PATH; ?>shares" class="btn btn-danger">Cancel</a>
        </form>    
    </div>
</div>
