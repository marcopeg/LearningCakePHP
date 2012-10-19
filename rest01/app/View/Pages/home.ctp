
<h2>REST API - 01</h2>

<p>
	This DEMO app shows you how to configure a simple REST API to:
</p>

<ul>
	<li><?php echo $this->Html->link('register users',array('controller'=>'users','action'=>'register')) ?></li>
	<li><?php echo $this->Html->link('loggin in/out users',array('controller'=>'users','action'=>'login')) ?></li>
	<li><?php echo $this->Html->link('fetch and update user\'s profile',array('controller'=>'users','action'=>'index')) ?></li>
</ul>

<p>
	For simplicity we don't make use of any DB. <br>
	Users are stored into a JSON serialized file handled by a <em>datasource</em>. <br>
	This way our app talks with JSON DB with a <em>model</em> as every CakePHP application.
</p>

<h2>Tutorial Step</h2>

<ol>
	<li>setup our JSON database file</li>
	<li>setup a <em>datasource</em> to access that file</li>
	<li>setup a <em>Model</em> to handle users</li>
	<li>setup a <em>Controller</em> to test CRUD operations through our Model</li>
	<li>setup registration / login / profile actions and UI</li>
	<li>setup <em>Authentication</em></li>
	<li>activate REST API on our application</li>
</ol>

<h2>Focus:</h2>

<ul>
	<li>we build an APP with both HTML and REST interface depends on <strong>how you require app resources</strong></li>
	<li>we build an APP that uses a simple JSON db but you can change it to any other DB technology simply changing <em>database configuration file</em></li>
	<li>we write extremely DRY and declarative source code.</li> 
</ul>

<h2>Technologies in this App Tutorial</h2>

<ul>
	<li>MAMP</li>
	<li>
		CakePHP
		<ul>
			<li>MVC</li>
			<li>Datasource</li>
			<li>RequestHanlder</li>
			<li>AuthComponent</li>
		</ul>
	</li>
	<li>
		CakePOWER
		<ul>
			<li>Declarative Events</li>
		</ul>
	</li>
</ul>


<h2>One core, many clients!</h2>

<p>
	REST approach to data handling allow to create more than one end point for our app:
</p>

<ul>
	<li><?php echo $this->Html->link('Desktop Web App',array('controller'=>'ui','action'=>'desktop')) ?></li>
	<li><?php echo $this->Html->link('Mobile Web App',array('controller'=>'ui','action'=>'mobile')) ?></li>
	<li><?php echo $this->Html->link('Auto Detect',array('controller'=>'ui','action'=>'index')) ?></li>
</ul>