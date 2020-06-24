#### Available algorithms
- google_directions_30
- google_directions
- straight

#### Available transformations:
- even_distribution
- log_with_base

###### Example of use
General
```php
DurationScore::evaluate('49.9808,36.2527', '50.4547,30.5238', 'google_directions', 'even_distribution')
```

Real example you can find in the 
`src\Controller\DistanceController.php`
