<?php $json = json_decode(file_get_contents('school.json'), true);
      $school = $json['school'];
?>
<div class='columns is-multiline is-mobile'>
  <?php for ($i=0; $i < 8; $i++) { ?>
  <div class="column is-one-quarter">
    <div class="card">
      <div class="card-content">
        <div class="media">
          <div class="media-left">
            <figure class="image is-48x48">
              <a href="<?= $school[$i]['site']?>" target="_blank"><img src="<?= $school[$i]['logo']?>" alt="Placeholder image"></a>
            </figure>
          </div>
          <div class="media-content">
            <p class="title is-4"><?= $school[$i]['name'] ?></p>
          </div>
        </div>
        <div class="content">
            <p><?= 'Batiment: '.$school[$i]['batiment'].', etage: '.$school[$i]['etage'] ?></p>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
</div>