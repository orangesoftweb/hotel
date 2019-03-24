<!-- Create Editable Content Areas -->

<div mc:edit="preheader_leftcol_content">
	<p>Use this area to offer a short preview of your email's content.</p>
</div>

<div mc:edit="preheader_rightcol_content">
	<p><a href="*|ARCHIVE|*" target="_blank">View email in your browser</a></p>
</div>

<img src="https://cdn-images.mailchimp.com/template_images/gallery/5ab9a40f-549b-4619-92c2-d7fd6e34e6b4.png" style="max-width:564px;" class="templateImage" mc:label="header_image" mc:edit="header_image" mc:allowdesigner mc:allowtext>

<div mc:edit="body_content">
	<h1>OrangeSoftWeb</h1>
	<h2>Hotel SunRise</h2>
	<h3>Heading 3</h3>
	<h4>Heading 4</h4>
	<p><strong>Getting started!</strong><br>To choose your fonts, colors, and styles, click <strong>Edit Design</strong> at the bottom of this screen. After you create a look and feel you love, click inside this box to start adding your own content.</p>
	<p>Any time you create a layout here, you'll be able to find it in the <strong>Saved Templates</strong> tab on the <strong>Templates</strong> step. Then, you can reuse it as-is or quickly create new, similar versions for different types of messages.</p>
	<p>Our <a href="https://templates.mailchimp.com/">Email Design Reference</a> can help you add content blocks to this template or show you how to design and code your own from scratch.</p>
</div>

<div mc:edit="social_bar">
	<a href="*|TWITTER:PROFILEURL|*" class="utilityLink">Follow on Twitter</a><span class="mobileHide"> &nbsp; | &nbsp; </span><a href="*|FACEBOOK:PROFILEURL|*" class="utilityLink">Friend on Facebook</a>
	<span class="mobileHide"> &nbsp; | &nbsp; </span><a href="*|FORWARD|*" class="utilityLink">Forward to a Friend</a>
</div>

<div mc:edit="footer_content">
	*|IF:LIST|*
	<em>Copyright &copy; *|CURRENT_YEAR|* *|LIST:COMPANY|*, All rights reserved.</em>
	<br>
	<!-- *|IFNOT:ARCHIVE_PAGE|* -->
	*|LIST:DESCRIPTION|*
	<br>
	<strong>Our mailing address is:</strong>
	<br> *|HTML:LIST_ADDRESS_HTML|*
	<br>
	<!-- *|END:IF|* -->
	*|ELSE:|*
	<!-- *|IFNOT:ARCHIVE_PAGE|* -->
	<em>Copyright &copy; *|CURRENT_YEAR|* *|USER:COMPANY|*, All rights reserved.</em>
	<br>
	<strong>Our mailing address is:</strong>
	<br> *|USER:ADDRESS_HTML|*
	<!-- *|END:IF|* -->
	*|END:IF|*
</div>

 <div mc:edit="monkeyrewards">
	*|IF:REWARDS|* *|HTML:REWARDS|* *|END:IF|*
</div>

<div mc:edit="utility_bar">
	<a href="*|UNSUB|*" class="utilityLink">unsubscribe from this list</a><span class="mobileHide"> | </span><a href="*|UPDATE_PROFILE|*" class="utilityLink">update subscription preferences</a>
	<!-- *|IFNOT:ARCHIVE_PAGE|* --><span class="mobileHide"> | </span><a href="*|ARCHIVE|*" class="utilityLink">view email in browser</a>
	<!-- *|END:IF|* -->
</div>

