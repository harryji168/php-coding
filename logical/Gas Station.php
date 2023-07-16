<?php

/*
 * Gas Station
 * 
 * The function GasStation(strArr) takes strArr which will be an array consisting 
 * of the following elements: 
 * N: the number of gas stations in a circular route.
 * Each subsequent element will be the string g:c where 
 * g is the amount of gas in gallons at that gas station and 
 * c will be the amount of gallons of gas needed to get to the following gas station.
 *
 * For example strArr may be: ["4","3:1","2:2","1:2","0:1"].
 * 
 * Your goal is to return the index of the starting gas station that will allow you 
 * to travel around the whole route once, otherwise return the string impossible.
 * 
 * For the example above, there are 4 gas stations, and your program should return 
 * the string 1 because starting at station 1 you receive 3 gallons of gas and spend 1 
 * getting to the next station. Then you have 2 gallons + 2 more at the next station and 
 * you spend 2 so you have 2 gallons when you get to the 3rd station.
 * 
 * You then have 3 but you spend 2 getting to the final station, and at the final station 
 * you receive 0 gallons and you spend your final gallon getting to your starting point.
 * Starting at any other gas station would make getting around the route impossible, 
 * so the answer is 1.
 * 
 * If there are multiple gas stations that are possible to start at, return the smallest 
 * index (of the gas station). N will be >= 2.
 */



function GasStation($strArr)
{
    // The total number of gas stations.
    $n = (int)$strArr[0];

    // List of all the gas stations.
    $gasStations = array_slice($strArr, 1);

    // The starting gas station, initialized to -1 (not found).
    $startStation = -1;

    // The total amount of gas across all stations and the current amount of gas, both initially 0.
    $totalGas = 0;
    $currentGas = 0;

    // Iterate over each gas station.
    for ($i = 0; $i < $n; $i++) {
        // Split the gas station's information into the amount of gas and the cost to get to the next station.
        list($gas, $cost) = explode(':', $gasStations[$i]);

        // Add the net gain (or loss) of gas at this station to the total and current amounts of gas.
        $totalGas += $gas - $cost;
        $currentGas += $gas - $cost;

        if ($currentGas < 0) {
            // If the current amount of gas is negative (we can't reach the next station), start over at the next station.
            $startStation = $i + 1;
            $currentGas = 0;
        } elseif ($startStation === -1) {
            // If the starting station hasn't been set yet, set it to the current station.
            $startStation = $i;
        }
    }

    // If the total amount of gas is nonnegative (we can make a full circuit), return the starting station (1-indexed). Otherwise, return "impossible".
    return ($totalGas >= 0) ? $startStation + 1 : "impossible";
}



// keep this function call here
echo GasStation(fgets(fopen('php://stdin', 'r')));
