#!/usr/bin/python
import string
from itertools import islice

class Day3:
    def __init__(self):
        self.priorities = dict(zip(
            list(string.ascii_lowercase) + list(string.ascii_uppercase),
            range(1, 53)
        ))

        self.part1()
        self.part2()

    def chunk(self, array, size):
        array_range = iter(array)
        return iter(lambda: tuple(islice(array_range, size)), ())

    def part1(self):
        file = open('../../data/3.txt', 'r')
        sum = 0
        for x in file:
            x = x.strip()
            cmplen = int(len(x) / 2)
            s1 = set(list(x[0:cmplen])).intersection(set(list(x[cmplen:]))).pop()
            sum += self.priorities[s1]

        print(f'Part 1: {sum}')

    def part2(self):
        file = open('../../data/3-2.txt', 'r')

        lines = []
        for x in file:
            x = x.strip()
            lines.append(set(x))

        sum = 0
        for x in self.chunk(lines, 3):
            item = set(x[0]).intersection(x[1], x[2]).pop()
            sum += self.priorities[item]

        print(f'Part 2: {sum}')


Day3()
