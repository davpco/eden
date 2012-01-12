<a class="prev" href="/documentation/library/classes">&laquo; 2. Classes</a>
<a class="next" href="/documentation/library/errors">4. Error Handling &raquo;</a>

<h3>3. Autoloading</h3>

<p>To prevent conflicts with other libraries, autoloading in <strong>Eden</strong> by default is turned off. But that doesn't mean we have to write a line for each class you want to include. Before we talk about autoloading, let's first talk about how to load a class manually, in the case you are working with other libraries.</p>

<sub>Figure 1. Load a class</sub>
<div class="example"><pre class="brush: php;">
eden('loader')
	->addRoot('/our/root/path')
	->addRoot('/another/root/path')
	->load('My_Session');
</pre></div>

<p>First thing we did was add two root paths called <em>/our/root/path</em> and <em>/another/root/path</em>. When we set root paths, <strong>Eden</strong> will check in those directories for any class called by <sub>load()</sub>, in this case <sub>My_Session</sub>. <strong>Eden</strong> has adopted class naming conventions made popular from Zend Framework which is in relation to a <em>cascading file system</em>. Going back to <sub>Figure 1</sub>, the class <sub>My_Session</sub> would need to be located in either <em>/our/root/path/my/session.php</em> or <em>/another/root/path/my/session.php</em>. Depending on what root we added first, is where Eden will check first.</p>

<blockquote class="tip clearfix">
	<span class="icon"></span>
	Calling <strong>Eden_Loader</strong> like <em>eden('loader')</em> or <em>eden()->Eden_Loader()</em> is the same as <em>Eden_Loader::i()</em>. Up to you which one you prefer.
</blockquote>

<p>Whenever <sub>Eden_Loader</sub> is called it's <strong>loaded as a singleton</strong> so there's no need to set it to a variable. If we are not working with other libraries or want to turn on <strong>Eden's</strong> autoloader, <sub>Figure 2</sub> shows us how we can acheive this.</p>

<sub>Figure 2. Register our loader</sub>
<div class="example"><pre class="brush: php;">
//set autoload class as the autoload handler
spl_autoload_register(array(Eden_Loader::i(), 'handler'));
</pre></div>

<p>At this point we are free to call classes without worrying about what files we need to include.</p>

<a class="prev" href="/documentation/library/classes">&laquo; 2. Classes</a>
<a class="next" href="/documentation/library/errors">4. Error Handling &raquo;</a>