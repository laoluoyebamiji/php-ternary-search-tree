PHP implementation of a ternary search tree.

It's pretty slow at loading large data sets but once loaded it is very fast at searching them. Loading the example data file in a ternary tree written in C takes a couple seconds. It takes just over 30 seconds using the PHP tree and uses ~380MB of memory. Searching the PHP ternary tree is around .0001 to .0002 seconds.

These numbers come from an IBM blade running Fedora with 3GB of RAM and dual 3.2GHz Xeons.