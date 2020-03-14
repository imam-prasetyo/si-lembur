			<!-- Page Heading/Breadcrumbs -->
			<!-- <h1 class="mt-4 mb-3">
				<small><?//= $data["title"]; ?></small>
			</h1> -->
			</br>

			<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
				<a href="<?= site_url($data["config_web"]["admin_panel"]); ?>">Dashboard</a>
				</li>
				<?php if(isset($data["breadcrumb"]["function"]["name"]) && $data["breadcrumb"]["function"]["length"] > 0) { ?>
				<li class="breadcrumb-item active"><?= setTitlePage("-", $data["breadcrumb"]["function"]["name"]); ?></li>
				<?php } ?>
			</ol>
