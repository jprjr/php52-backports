dnl $Id: config.m4 218722 2006-08-23 09:47:21Z tony2001 $
dnl config.m4 for extension reflection

PHP_ARG_ENABLE(reflection, whether to enable reflection support,
[  --disable-reflection    Disable reflection support], yes)

if test "$PHP_REFLECTION" != "no"; then
  AC_DEFINE(HAVE_REFLECTION, 1, [Whether Reflection is enabled])
  PHP_NEW_EXTENSION(reflection, php_reflection.c, no)
fi
