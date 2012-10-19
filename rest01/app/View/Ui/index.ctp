<?php
/**
 * CakePHP + CakePOWER REST Service Tutorial Demo
 * ==============================================
 *
 * @author:		Marco Pegoraro
 * @contact:	marco(dot)pegoraro(at)gmail(dot)com
 * @follow:		@thepeg
 * @blog:		http://movableapp.com
 * @blog:		http://consulenza-web.com
 *
 * This sofware is distributed under MIT license.
 * Please read the "readme.txt" file from the root of this package
 *
 */
?>

<h2>Are you using IE? Really??</h2>

<p style="font-size:1.3em;text-indent:25px">
	I just want to know <b>WHY</b>!
</p>

<p>
	Please download a modern and safer browser like Chrome, Safari or Firefox and trash Explorer from your computer!<br>
	Trust me, you will appreciate my suggest!
</p>

<hr style="margin-bottom:20px">

<p>
	But if you know what you are doing and you want (or must) to continue to frustrate yourself with this kinda browser you should use
	this simple yet compatible static ugly ancient interface.
</p>

<p>
	<?php echo $this->Html->link( 'Click here to confirm you want to use IE', array( 'controller'=>'users' )) ?>
</p>