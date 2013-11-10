<?php
/**
 * Friends Gallery CSS
 *
*/
?>
/* <style> /**/


/* ***************************************
	FRIENDS GALLERY
*************************************** */
.elgg-avatar-large > a > img {
	max-width: 100%; /* core fix, remove rule set when changed in core */
	height: auto;
}
.elgg-gallery-friends {
	overflow: hidden;
	margin-top: 10px;
	border-top: none;
}
.elgg-gallery-friends > li h3 {
	overflow: hidden; 
	text-overflow: ellipsis;
	white-space: nowrap;
	line-height: 1.4em;
	color: #FFF;
}
.elgg-gallery-friends li {
	float: left;
	position: relative;
	width: 25%;
	padding: 0;
	padding-bottom: 25%;
	border: none;
}
.elgg-gallery-friends .elgg-image-block {
	position: absolute;
	left: 10px;
	right: 10px;
	top: 10px;
	bottom: 10px;
	overflow: hidden;
	padding: 0;
}
.elgg-gallery-friends .elgg-image-block .elgg-subtext,
.elgg-gallery-friends .elgg-image-block .elgg-menu-entity {
	display: none;
}
.elgg-gallery-friends .elgg-image-block img {
	width: 100%;
}
.elgg-gallery-friends .elgg-image-block .elgg-body {
	position: absolute;
	bottom: 0;
	left: 0;
	right: 0;
	margin-bottom: -50px;
	background: #000;
	background: rgba(0, 0, 0, 0.5);
	color: #FFF;
	padding: 10px;
	text-align: center;
	-webkit-transition: all 0.3s ease-out;
	-moz-transition: all 0.3s ease-out;
	-o-transition: all 0.3s ease-out;
	transition: all 0.3s ease-out;
}
.elgg-gallery-friends .elgg-image-block:hover .elgg-body {
	margin-bottom: 0;
}
.elgg-gallery-friends .elgg-image {
	margin: 0;
	padding: 0;
}
.elgg-gallery-friends .elgg-body a {
	color: #FFF;
	text-shadow: none;
	font-weight: normal;
}
@media (max-width : 1290px) {
	.elgg-gallery-friends li {
		width: 25%;
		padding-bottom: 25%;
	}
}
@media (max-width : 660px) {
	.elgg-gallery-friends li {
		width: 33.3%;
		padding-bottom: 33.3%;
	}
}
@media (max-width : 440px) {
	.elgg-gallery-friends li {
		width: 50%;
		padding-bottom: 50%;
	}
}
