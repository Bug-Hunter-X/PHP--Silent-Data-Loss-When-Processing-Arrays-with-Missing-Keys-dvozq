```php
function processData(array $data): array {
  // Assume $data is an array of associative arrays, each with a 'value' key.
  $result = [];
  foreach ($data as $item) {
    if (isset($item['value'])) {
      $result[] = $item['value'];
    } else {
      // Handle cases where 'value' is missing.  This is where the bug often hides.
      // Many programmers skip proper error handling here.
    }
  }
  return $result;
}

$myData = [
  ['value' => 1],
  ['value' => 2],
  ['value' => 3],
  ['value' => 4],
  ['anotherKey' => 5] // Missing 'value' key
];

$processedData = processData($myData);
print_r($processedData); //Notice that the last element is missing because of missing key
```