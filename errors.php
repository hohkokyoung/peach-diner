<?php  if (count($errors) > 0) : ?>
    <div class="error">
        <?php foreach ($errors as $error) : ?>
		<ul>
        <li><?php echo $error ?></p></li>
		</ul>
        <?php endforeach ?>
    </div>
<?php  endif ?>