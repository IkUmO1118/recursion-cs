import sys
import random

sys.stdout.buffer.write(b'input max number\n')
sys.stdout.flush()
max_number = int(sys.stdin.buffer.readline().strip())

sys.stdout.buffer.write(b'input min number\n')
sys.stdout.flush()
min_number = int(sys.stdin.buffer.readline().strip())

limit_counter = 5;

if max_number > min_number:
  answer_int = random.randint(min_number, max_number)

  sys.stdout.buffer.write(b'guess the number!\n')
  sys.stdout.flush()
  user_input = int(sys.stdin.buffer.readline().strip())

  while  answer_int != user_input and limit_counter > 1:
    sys.stdout.buffer.write(b'change your input number\n')
    sys.stdout.flush()
    user_input = int(sys.stdin.buffer.readline().strip())
    limit_counter -= 1

  if limit_counter > 1:
    sys.stdout.buffer.write(b'correct!\n')
    sys.stdout.buffer.write(f'Your answer is {answer_int}\n'.encode())
    sys.stdout.flush()
  else:
    sys.stdout.buffer.write(b'fail!\n')
    sys.stdout.buffer.write(f'Your answer is {answer_int}\n'.encode())
    sys.stdout.flush()