<?php global $meta_sep; ?>
<?php /* mods
9Jan16 zig - dont show comment count */ ?>
<nav class="post-nav meta-font secondary_text">
	<ul class="clearfix">
		<?php /* <li class="post-meta post-comments">
			<a href="<?php comments_link(); ?>"><?php comments_number('0','1','%');?> <?php _e(' comments','oshin'); ?></a><span class="post-meta-sep">/</span>
		</li> */ ?>
		<li class="post-meta"><?php echo get_the_date(); ?></li>
	</ul>
</nav>
