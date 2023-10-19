#include<bits/stdc++.h>
using namespace std;
int Tinh(int n)
{
	if(n%2==0)              
	{
		if(n==2)            
		{
			return 2;
		}
	}
	else
	{
		if(n==1)  
		{
			return 1;
		}
	}
	return n*Tinh(n-2);
}
int main()
{
	int n; 
	cin>>n;
	cout<<Tinh(n);
}
