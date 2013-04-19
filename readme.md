# Wordpress Base Plugin

This is a base plugin file for faster development of Wordpress plugins.

It includes all of the base functionality that any plugin will need.

## How to use
To build a new plugin, simply copy and paste the entire codebase, from here, into your plugin directory.

Ie; if my plugin was called 'My Plugin', I would place the files in:

`{wordpress_plugin_dir}/my-plugin/`

Then there's just a few little set-up steps (which you'd have to do on a normal Plugin anyway)

### Set-up
* Rename the file `/my-plugin.php` to match the folder name. This will become your main plugin file.
* Open the renamed file and:
    * edit the package name and version number to your own
    * Change the plugin details ('Name', 'URI', 'Description' etc)
    * At the bottom of the file are two lines of code.

        First, decide on a unique name (usually your plugin's name, removing any spaces or non alphabetical characters).
        ie; "Dave's Plugin" would become "DavesPlugin".

        1. find the following:

            `require_once(dirname(__FILE__) . '/classes/MyPlugin.class.php');`

            Replace `MyPlugin` with your unique name.

            ie;

            `require_once(dirname(__FILE__) . '/classes/DavesPlugin.class.php');`

        3. Find the following:

            `$myPlugin = new MyPlugin('Plugin Name', 'pluginVariableName', null, true);`

            And replace `MyPlugin` and `$myPlugin` with your unique name.
            Also, `Plugin Name` is the name that Wordpress will recognise your plugin as.

            The `pluginVariableName` string is used in various back-end settings. It is best to either set this to something relevant and unique or set it to an empty string.

            The third argument (`null`) is the db prefix, for any database tables. Setting to null will cause the plugin to auto generate one, based on the plugin name.
            Setting to an empty string will mean that no db prefix is generated.

            The fourth (and last) argument is a boolean flag which tells the plugin whether we're in debug mode or not. Set to false when going live.

            ie;

            `$davesPlugin = new DavesPlugin('Dave\'s Plugin', 'davesPluginVariable', '', false);`

* Now go to the `classes/` folder and rename `MyPlugin.class.php` to `NAME.class.php`, where name is the unique name that you have created.

    ie;

    `DavesPlugin.class.php`
* open this newly named file and find the following:

    `class MyPlugin extends PluginHandler`

    Replace `MyPlugin` with your unique name.

    ie;

    `class DavesPlugin extends PluginHandler`

### Building with
Now that you're set up, yo can start building your plugin.

All of the default install/uninstall activation hooks are already set up for you, inside the `classes/PluginHandler.class.php` file.

You can put all of your plugin functionality into the `classes/MyPlugin.class.php` file, which you will have renamed.

This class is an extension of the `PluginHandler` class so, by using it, you have access to the base functionality.

If you need to add any extra behaviour, on install or uninstall, simply overwrite the parent function, inside of your own plugin's class (just make sure that you call the parent's function too!).

ie;


	class MyPlugin extends PluginHandler{
		public function __construct($name, $varName = null, $dbPrefix = null, $debug = false){
			parent::__construct($name, $varName, $dbPrefix, $debug);
		}

		// here we overwrite the install function
		public function install(){
			// do something here...

			// now call the parent's install function
			parent::install();
		}
	}

## Libraries
Included in the base plugin are several useful libraries. This currently includes:

* **Form Validation**
    This enables Codeigniter style form validation within Wordpress. It makes handling forms far easier.
* **Message**
    A flexible messaging function, for sending error, success etc messages to the user.
* **Page**
    Enables the loading of pages.