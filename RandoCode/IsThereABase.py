''' I was interested if we can take any two integers, say n1 and n2, add heading 0's, and then
base expand them as in t1 and t2 below, so that they're equal in that base. The answer is not
to take this approach, but to case the problem as a polynomial equation, with the order equal 
to the number of digits in the largest of n1 and n2. Then numerical root finding is much better.
This arose spontaneously, and the correct way forward was provided by @Amoss on stackoverflow.
Terrible code by J Martin, 2016-02-12. '''

''' We define two numbers, such that n1 > n2...tho I'm flexible about this'''
n1 = "013"
n2 = "025"

''' Set the numbers as arrays. e.g. num1 = 313, num2 = 228. '''
num1 = list(range(len(n1)))
num2 = list(range(len(n2)))

for i in range(len(n1)):
     num1[i] = int(n1[i])
for i in range(len(n2)):
    num2[i] = int(n2[i])
''' Now we loop until we find a match, or no match is possible. '''
i = 1
j = 0
while True:
    t1=(num1[0]*(i**2)+num1[1]*i+num1[2])
    t2=(num2[0]*(i**2)+num2[1]*i+num2[2])
    print(t1)
    print(t2)
    ''' We need some way to check if t1 > t2 changes to t1 < t2 at some point
        or vise-versa -> then we know no match is possible '''
    if(i == 1):
        if t1>t2:
            j = 0
        else: j = 1
    if(t1==t2):        
        print("The numbers are equal in base %d" % i)
        break
    if(t2 > t1 and j == 0):
        print("No base possible! After %d steps" % i)
        break
    if(t1 > t2 and j == 1):
        print("No base possible! After %d steps" % i)
        break
    i=i+1
    if (i > 2**6):
        print("your search might be hopeless")
        break


    
