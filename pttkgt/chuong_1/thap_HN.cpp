#include<bits/stdc++.h>
using namespace std;
void ThapHN(int n,char A,char B,char C)
{
    if(n==1)
	cout<<endl<<"Chuyen dia tu"<<A<<"qua"<<C;  
	else  
    {
     ThapHN(n-1,A,C,B);         
     ThapHN(1,A,B,C);
     ThapHN(n-1,B,A,C);
    }
}
int main()
{
    int n;
    cin>>n;
    ThapHN(n,'A','B','C');
}
