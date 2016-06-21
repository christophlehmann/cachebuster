# TYPO3 Cachebuster Extension

It adds a cachebuster to files referenced via FAL and Fluid Viewhelpers like f:uri.resource or f:image and makes it possible to savely set cache-control headers like

```
RewriteEngine On
RewriteCond %{QUERY_STRING} ^. [NC]
RewriteRule ^(fileadmin|uploads|typo3conf|typo3temp)/ - [E=SETCACHEHEADER:1]
Header set  Cache-Control "max-age=2592000" env=SETCACHEHEADER
```

Files in `fileadmin/_processed_` are cachable too, since file modifications to the original leads to a new processed file.

So you can add

```
RewriteRule ^fileadmin/_processed_/ - [E=SETCACHEHEADER:1]
```
