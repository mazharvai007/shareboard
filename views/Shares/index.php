<div class="lead mt-5 text-center mb-5">
    <a href="<?php echo ROOT_PATH; ?>shares/add" class="btn btn-lg btn-secondary">Share Something</a>
</div>

<div class="container">
    <div class="row">
        <?php foreach($viewModel as $item) : ?>
            <div class="col-md-12">
                <div class="jumbotron pt-4 pb-3">
                    <h3><?php echo $item['title']; ?></h3>
                    <small><?php echo $item['create_date']; ?></small>
                    <hr>
                    <p class="mt-3"><?php echo $item['body']; ?></p>
                    <div class="btn-group">
                        <a class="btn btn-md btn-outline-secondary" href="<?php echo $item['link']; ?>" target="_blank">Go To Website</a>
                    </div>                    
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>