# Shortcuts (EN)

This module allows users to add shortcuts to backoffice's pages in order to quickly navigate in the backoffice.

## Installation

### Manually

* Copy the module into ```<thelia_root>/local/modules/``` directory and be sure that the name of the module is Shortcuts.
* Activate it in your Thelia administration panel

 OR

* From the modules pages, in the "Install or Update a module section", browse to the module zip file (Shortcuts.zip) on your filesystem and click install
* Activate the module in the administration panel

A link to the shortcuts configuration page is automatically added on module's installation.

## Usage

This module adds a "Shortcuts" menu item in backoffice (located in the top navigation menu). A click on this menu item show all user defined shortcuts in a dropdown menu.

To add a shortcut:

1. Go to the backoffice page you want to bookmark
2. Copy the page url (/admin/configuration/advanced for example)
3. Go the the Shortcuts settings pages and click on the + button
4. Enter a shortcut name in the shotcut title field
5. Paste the previously copied url in the shortcut url field


## Hook

The module use the main.topbar-top hook to display the shortcuts in the backoffice



## The `shortcuts` loop

{loop type="shortcuts" name="my-loop-name" user_id={admin attr="id"}}...{/loop}


### Input arguments

|Argument |Description |
|---      |--- |
|**user_id** | An admin id |

### Output arguments

|Variable   |Description |
|---        |--- |
|$ID        | The shortcuts ID |
|$TITLE     | The shortcut's dropdown menu title  |
|$URL       | The backoffice page url the shortcut leads to |
|$ADMIN_ID  | Admin user id |
|$POSITION  | Shortcut position |

### Example
```
{loop type="shortcuts" name="user-shortcuts" user_id={admin attr="id"}}
	<li>
	    <a href="{$URL}" title="{$TITLE}">
	        {$TITLE}
	    </a>
	</li>
{/loop}
```

## TODO

* Manage shortcut position in the list
* Manage shortcuts loop order argument
* Allow shortcut edit
* Add a bookmark this page button

- - -

# Shortcuts (FR)

This module allows users to add shortcuts to backoffice's pages in order to quickly navigate in the backoffice.
Ce module permet aux utilisateurs du backoffice d'ajouter des raccourcis vers des pages spécifiques afin d'accélérer la navigation au sein du backoffice.

## Installation manuelle

* Copier le module dans le dossier ```<thelia_root>/local/modules/``` en vous assurant que le nom du dossier du module est bien **Shortcuts**
* Activer le module dans le panneau d'administration de Thelia (Panneau d'administration > Modules)

 OU

* Depuis la page Modules, dans la section "Installer ou mettre à jour", choisissez le fichier ZIP du module et cliquez sur le bouton "Installer"
* Activer le module dans le panneau d'administration de Thelia (Panneau d'administration > Modules)

Un lien vers la page de configuration des raccourcis est automatiquement ajouté lors de l'installation du module.

## Utilisation

Le module ajoute un menu "Raccourcis" dans le menu de navigation supérier de thelia. Un click sur ce menu affiche la liste des raccourcis existants dans un menu déroulant

Pour ajouter un raccourci:

1. Rendeez vous sur la page que vous souhaitez ajouter en raccourci
2. Copiez l'url de la page (/admin/configuration/advanced par exemple)
3. Rendez vous sur la page de configuration des raccourcis et cliquez sur le bouton +
4. Saisissez le nom du raccourci
5. Coller l'url précédemment copiée dans le champ "Url du raccourci"


## Hook

Le module utilise le hook bouclemain.topbar-top pour afficher la liste des raccourci dans le menu supérieur.


## La boucle `shortcuts`

{loop type="shortcuts" name="nom-de-" user_id={admin attr="id"}}...{/loop}


### Paramètres

|Argument |Description |
|---      |--- |
|**user_id** | Identifiant de l'utilisateur backoffice |

### Variables retournées

|Variable   |Description |
|---        |--- |
|$ID        | L'identifiant du raccourci en base de données |
|$TITLE     | le titre du raccourci  |
|$URL       | L'url de la page du backoffice vers laquelle le raccourci redirige |
|$ADMIN_ID  | L'identifiant de l'utilisateur du backoffice |
|$POSITION  | La position du raccourci |

### Exemple
```
{loop type="shortcuts" name="user-shortcuts" user_id={admin attr="id"}}
	<li>
	    <a href="{$URL}" title="{$TITLE}">
	        {$TITLE}
	    </a>
	</li>
{/loop}
```

## TODO

* Gérer la position du raccourci dans la liste
* Permettre le classement des raccourcis retournés par la boucle
* Permettre la modification d'un raccourci
* Ajouter un bouton "Ajouter cette page aux raccourcis"
