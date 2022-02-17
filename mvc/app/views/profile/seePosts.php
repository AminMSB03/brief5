<?php require_once 'VIEWS/inc/headerUser.php' ?>
<link rel="stylesheet" href="http://app.msb/assets/CSS/addPostStyle.css">




<div class="content">
    <div class="side">
        
        </div>
        
        <div class="middle-side">
            <div class="button">
                <!-- Button trigger modal -->

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="http://app.msb/user/save" method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">Images URL : </span>
                                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="imgScr">
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Description</span>
                                <textarea class="form-control" aria-label="With textarea" name="desc"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="hidden" name="idCreator" value="<?= $user['id']?>">
                            <input type="submit" class="btn btn-primary" value="Add Post" name="add"></input>
                        </div>
                        </form>
                        </div>
                    </div>
                    </div>                    
                </div>
            <?php foreach($posts as $post): ?>
                <div class="post">
                    <div class="head">
                        <div class="pro-pic" ></div>
                        <?php foreach($user as $us): ?>
                            <?php if($us['id']==$post['id_creator']){?>
                                <h5><?= $us['nom'];?></h5>
                            <?php } ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="movie-desc">
                        <h6><?= $post['description']?></h6>
                    </div>
                    <div class="movie-pic" style="background-image: url('<?= $post['img_src']?>');"></div>
                    <div class="form">
                        <form action="">
                            <input type="hidden" value="<?= $user_now['id']?>">
                            <div class="input-group">
                                <span class="input-group-text">Comment : </span>
                                <textarea class="form-control" aria-label="With textarea"></textarea>
                            </div>
                            <input type="submit" class="btn  btn-primary envoyer">
                        </form>
                        <div class="comments">
                            <?php foreach($comments as $comment ):?>
                                <div class="comm">
                                <?php if($comment['id_post']==$post['id']):?>
                                    <?php foreach($user as $use ):?>
                                        <?php if($comment['id_user']==$use['id']):?>
                                        <a class="comment_creator"><?= $use['nom'];?></a>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    <p> : <?= $comment['comment'];?></p>
                                <?php endif; ?>
                        </div>
                            <?php endforeach; ?>
                    </div>        
                        
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <div class="side">
        
        </div>
</div>

















<?php require_once 'VIEWS/inc/footer.php' ?>