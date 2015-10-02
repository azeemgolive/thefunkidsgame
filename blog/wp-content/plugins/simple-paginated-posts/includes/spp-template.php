<?php
/**
 * Template for automatically including SPP template functions in the content
 */

$new_content .= $this->print_continued( array( 'next_or_previous' => 'previous', 'echo' => 0 ) );
$new_content .= $content;
$new_content .= $this->print_continued( array( 'before' => '<div class="spp-continued">', 'after' => '</div>', 'next_or_previous' => 'next', 'echo' => 0 ) );
$new_content .= $this->page_links( array( 'before' => '<div class="spp-page-links"><span>' . __( 'Pages:' ) . '</span> ', 'after' => '</div>', 'next_or_number' => 'both', 'echo' => 0 ) );
$new_content .= $this->the_toc( array( 'before' => '<div class="spp-toc"><span>' . __( 'Table of contents:', 'simple-paginated-posts' ) . '</span>', 'after' => '</div>', 'echo' => 0 ) );
