#!/usr/bin/env python
import inquirer, re

print

# CHECKBOXES
questions = [
    inquirer.Checkbox('interests',
        message="What are you interested in?",
        choices=['Computers', 'Books', 'Science', 'Nature', 'Fantasy', 'History'],
    ),
]
answers = inquirer.prompt(questions)
print answers, "\n"

# LIST
questions = [
    inquirer.List('size',
        message="What size do you need?",
        choices=['Jumbo', 'Large', 'Standard', 'Medium', 'Small', 'Micro'],
    ),
]
answers = inquirer.prompt(questions)
print answers, "\n"

# TEXT INPUT
questions = [
    inquirer.Text('name', message="What's your name"),
    inquirer.Text('surname', message="What's your surname"),
    inquirer.Text('phone', message="What's your phone number")
]
answers = inquirer.prompt(questions)
print answers, "\n"

# CONFIRMATION
questions = [
    inquirer.Confirm('correct',  message='This will delete all your current labels and create a new ones. Continue?', default=False)
]
answers = inquirer.prompt(questions)
print answers, "\n"

# PASSWORD
questions = [
    inquirer.Password('password', message='Please enter your password')
]
answers = inquirer.prompt(questions)
print answers, "\n"
