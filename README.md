# proto-unknown-fields

Illustrates a difference in behavior decoding JSON with the Protobuf C extension
and native PHP library.


Without the C extension, unknown fields do not cause an issue:

```
$ ./script/test-without-extension unknown_fields_not_allowed.php
ok
```

With the C extension, they cause an exception:


```
$ ./script/test-with-extension unknown_fields_not_allowed.php 
Fatal error: Uncaught Exception: Error occurred during parsing: Error parsing JSON @1:11: No such field: unknown in /src/unknown_fields_not_allowed.php:6
Stack trace:
#0 /src/unknown_fields_not_allowed.php(6): Google\Protobuf\Internal\Message->mergeFromJsonString('{"unknown":true...', false)
#1 {main}
  thrown in /src/unknown_fields_not_allowed.php on line 6
```

If you set the `ignore_unknown` parameter, the C extension behaves as expected:

```
$ ./script/test-with-extension unknown_fields_allowed.php
ok
```
