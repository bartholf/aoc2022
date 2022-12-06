#!/usr/bin/python

import re


class Day5:
    def __init__(self):
        with open('../data/2022/5.txt', 'r') as x:
            self.data = x.read().splitlines()
        self.part1()
        self.part2()

    def init_stacks(self):
        self.stacks = [[], [], [], [], [], [], [], [], []]
        for row in reversed(range(8)):
            i = 1
            for col in range(9):
                val = self.data[row][i:i+1]
                if val.strip() != '':
                    self.stacks[col].append(val)
                i += 4

    def move(self, take, ix, to, reverse):
        popped = []
        for i in range(take):
            popped.append(self.stacks[ix - 1].pop())

        a = reversed(popped) if reverse else popped

        for i in a:
            self.stacks[to - 1].append(i)

    def go(self, reverse):
        i = 10
        while i < len(self.data):
            m = re.search("^move (\d+) from (\d+) to (\d+)", self.data[i])
            self.move(*[int(x) for x in m.groups()], reverse)
            i += 1

        a = ''
        for i in self.stacks:
            a += i[len(i) - 1]
        print(a)

    def part1(self):
        self.init_stacks()
        self.go(False)

    def part2(self):
        self.init_stacks()
        self.go(True)


Day5()
