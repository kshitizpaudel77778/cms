<div class="widget shadow-lg p-3 mb-5 bg-white rounded">
	<?php echo form_open(base_url().'search'); ?>
		<div class="search input-group md-form form-sm form-2 pl-0">
			<input class="form-control my-0 py-1 red-border" type="text" placeholder="<?php echo SEARCH_BLOG; ?>" name="search_string">
			<div class="input-group-append">
				<button type="submit" name="form1">
					<i class="fa fa-search"></i>
				</button>
			</div>
		</div>
	<?php echo form_close(); ?>
</div>
<div class="widget shadow-lg p-3 mb-5 bg-white rounded">
	<h3><?php echo RECENT_POSTS; ?></h3>
	<div class="type-2">
		<ul>
			<?php
			$i=0;
			foreach($blog_all as $row)
			{
				$i++;
				if($i>5) {break;}
				?>
				<li>
					<img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($row['photo']); ?>">
					<a href="<?php echo base_url(); ?>blog-detail/<?php echo safe_data($row['slug']); ?>"><?php echo safe_data($row['title']); ?></a>
				</li>
				<?php
			}
			?>
		</ul>
	</div>
</div>