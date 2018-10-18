What is this package?
=====================

This package contains a base Mouf template based on the Twitter Bootstrap library.

Bootstrap template
------------------

The Bootstrap template is a classical 1-2-3 column layout with a header and a footer.
It adapts automatically, so if you put nothing in the left column, it will disappear.
Using the template instance, you can customize the width of the columns, etc...

Template vs Bootstrap version
-----------------------------

Below is a simple table matching template versions and Bootstrap versions:

Bootstrap version | Template version
------------------|------------------
2.1               | 2.1.*
2.3               | 2.3.*
3.0               | 3.0
3.1               | 3.1
3.2               | 3.2
3.3               | 3.3
3.*               | 4.0
3.*               | 4.1
4.*               | 5.0
4.*               | 5.1 (uses Service providers instead of Mouf installer)

Bootstrap menu rendererer
-------------------------

So basically, if you are declaring your menus in Mouf, and if you use Bootstrap, this help you render the menus.
The renderer is making extensive use of objects declared in the [mouf\html.widgets.menu](https://github.com/thecodingmachine/html.widgets.menu) package.

Mouf package
------------

This package is part of Mouf (http://mouf-php.com), an effort to ensure good developing practices by providing a graphical dependency injection framework.
Using Mouf's user interface, you can create your menu graphically, by creating instances of Menu and MenuItem.

In practice
-----------

A menu is defined using the Menu class.
The Menu class can contain many MenuItem. Each menuitem can contain many MenuItem.
You pass a Menu instance to the BootstrapMenuRenderer::toHtml and it will render the menu. 
