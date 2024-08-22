import sys


sys.stdout.buffer.write(b'Enter the command.\n')
sys.stdout.flush()
args = sys.stdin.buffer.readline().decode().strip().split()

command = args[0]
input_pathname = args[1]


if command == "reverse":
  output_pathname = args[2]
  contents = ''
  output = ''

  with open(input_pathname) as f:
    contents = f.read()

  for char in contents:
    output = char + output

  with open(output_pathname, 'w') as f:
    f.write(output)

elif command == "copy":
  output_pathname = args[2]
  contents = ''

  with open(input_pathname) as f:
    contents = f.read()

  with open(output_pathname, 'w') as f:
    f.write(contents)

elif command == "duplicate-contents":
  duplicate_count = int(args[2])
  contents = ''
  output = '\n'

  with open(input_pathname) as f:
    contents = f.read()

  for _ in range(duplicate_count):
    output += (contents + '\n')

  with open(input_pathname, 'a') as f:
    f.write(output)

elif command == "replace-string":
  needle = args[2]
  newstring = args[3]
  contents = ''

  with open(input_pathname) as f:
    contents = f.read()

  contents = contents.replace(str(needle), str(newstring))
  print(contents)

  with open(input_pathname, 'w') as f:
    f.write(contents)