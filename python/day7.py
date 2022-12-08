from collections import defaultdict

with open('../data/2022/7.txt') as f:
    ls = [x.strip() for x in f.readlines()]

sizes = defaultdict(int)
stack = []
for l in ls:
    match l.split():
        case [_, _, "/"]:
            stack = []
        case [_, _, ".."]:
            stack.pop()
        case [_, _, y]:
            stack.append(y)
        case [a, _] if a.isdigit():
            for i in range(len(stack) + 1):
                path = "/" + "/".join(stack[:i])
                sizes[path] += int(a)

# Part 1
print(sum(filter(lambda v: v <= 100000, sizes.values())))

# Part 2
unused = 70000000 - sizes["/"]
need = 30000000 - unused
print(min(filter(lambda v: v >= need, sizes.values())))
