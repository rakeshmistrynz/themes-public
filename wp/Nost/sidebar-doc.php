<?php // wordpress sidebar containing Documentation menu - to appear only in documentation pages ?>
    <?="";get_the_ID();?>

    	<?php get_search_form(); ?>
    	<nav id="page_nav" class="group">
    	<h3>Documentation</h3>
	<ul>
		<li class="page_item <?=(get_the_ID() == 316)?"current_page_item":""?>"><a href="/category/help">Mobile App User Help</a>	
		<li class="page_item <?=(get_the_ID() == 522)?"current_page_item":""?>"><a href="/installation/">Installation</a></li>	
		<li class="page_item page_item_has_children <?=(get_the_ID() == 526)?"current_page_item":""?>"><a href="/configuration/">Configuration</a>
			<ul class="children">
				<li class="page_item page_item_has_children <?=(get_the_ID() == 791)?"current_page_item":""?>"><a href="/configuration/configure-access/">Access Config</a>
					<ul class="children">
						<li class="page_item <?=(get_the_ID() == 553)?"current_page_item":""?>"><a href="/configuration/configure-access/user-configuration/">API Access Control</a></li>
						<li class="page_item <?=(get_the_ID() == 800)?"current_page_item":""?>"><a href="/configuration/android-app-user-creation/">Android App User Creation</a></li>
					</ul></li>
				<li class="page_item <?=(get_the_ID() == 804)?"current_page_item":""?>"><a href="/configuration/android-app-profile/">App Profile Config</a></li>
				<li class="page_item page_item_has_children <?=(get_the_ID() == 795)?"current_page_item":""?>"><a href="/configuration/configure-attributes/">Attributes Config</a>
					<ul class="children">
						<li class="page_item page_item_has_children <?=(get_the_ID() == 560)?"current_page_item":""?>"><a href="/configuration/configure-attributes/attribute-features/">Attribute Features</a>
						<ul class="children">
							<li class="page_item <?=(get_the_ID() == 614)?"current_page_item":""?>"><a href="/configuration/configure-attributes/attribute-features/automated-product-name-generation/">Auto-Name Generation</a></li>
							<li class="page_item <?=(get_the_ID() == 616)?"current_page_item":""?>"><a href="/configuration/configure-attributes/attribute-features/bulk-product-name-rebuilding/">Bulk Name Rebuilding</a></li>
							<li class="page_item <?=(get_the_ID() == 612)?"current_page_item":""?>"><a href="/configuration/configure-attributes/attribute-features/formatting-attributes/">Formatting Attributes</a></li>
							<li class="page_item <?=(get_the_ID() == 683)?"current_page_item":""?>"><a href="/configuration/configure-attributes/attribute-features/hiding-an-entire-attribute-set/">Hiding an Attribute Set</a></li>
							<li class="page_item <?=(get_the_ID() == 618)?"current_page_item":""?>"><a href="/configuration/configure-attributes/attribute-features/hiding-attribute-values/">Hiding Attribute Values</a></li>
							<li class="page_item <?=(get_the_ID() == 620)?"current_page_item":""?>"><a href="/configuration/configure-attributes/attribute-features/hiding-attributes/">Hiding Attributes</a></li>
							<li class="page_item <?=(get_the_ID() == 681)?"current_page_item":""?>"><a href="/configuration/configure-attributes/attribute-features/merging-attribute-values/">Merging Attribute Values</a></li>
						</ul></li>
		<?php //				<li class="page_item"><a href="/configuration/configure-attributes/sample-attribute-set-creation/">Sample Attribute Set Creation</a></li> ?>
					</ul></li>
				<li class="page_item page_item_has_children <?=(get_the_ID() == 562)?"current_page_item":""?>"><a href="/configuration/category-mapping/">Category Mapping Config</a>
					<ul class="children">
						<li class="page_item <?=(get_the_ID() == 945)?"current_page_item":""?>"><a href="/configuration/category-mapping/combining-rules/">Combining Mapping Rules</a></li>
					</ul></li>
				<li class="page_item page_item_has_children <?=(get_the_ID() == 1414)?"current_page_item":""?>"><a href="/configuration/configure-reports/">Reports Config</a></li>

			</ul></li>
	

	</ul>
    	</nav><!-- page_nav -->
    	
