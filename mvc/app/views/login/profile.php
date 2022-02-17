<?php require_once 'VIEWS/inc/headerUser.php' ?>
<div class="container-profile">
    <div class="parameters"></div>

    <div class="profile-edit">
        <div class="mon-profile">
            <h1>Mon Profile</h1>
            <p>Gérez les paramètres de votre profil </p>
        </div>
        <div class="photo-profile">
            <h4> <b> Votre Photo de profile </b></h4>
            <div class="pic-edit">
                <div class="pic"></div>
                <div class="edit-out">
                    <button type="button" class="btn btn-outline-primary">Changer la photo</button>
                    <button type="button" class="btn btn-light">Supprimer</button>
                </div>
            </div>
            <div id="emailHelp" class="form-text">Ajouter une photo. La taille recommandée est 256×256px.</div>
        </div>
        <div class="profile-form">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user['email'] ;?>">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Numéro de Telephone</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value="<?= $user['num'] ;?>" >
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>


<?php require_once 'VIEWS/inc/footer.php' ?>